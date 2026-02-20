<?php

namespace Webkul\Epayco\Http\Controllers;

use App\Http\Controllers\Controller;

use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Models\Order;
use Webkul\Epayco\Helpers\Ipn;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Transformers\OrderResource;
use Illuminate\Http\Request;


class EpaycoController extends Controller
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected Ipn $ipnHelper
    ) {}
    //



    public function setOrder(){
        return $this->buildRequestBody($this->createOrder()->id);
    }

    public function createOrder(){
        $cart = Cart::getCart();
        $data = (new OrderResource($cart))->jsonSerialize();
        // crea la venta
        $order = $this->orderRepository->create($data);

        return $order;
    }

    public function buildRequestBody($orderId)
    {
        // Obtiene el carrito
        $cart = Cart::getCart();
        // Obtiene la informacion del carrito
        $allDataCart = new OrderResource($cart);

        // Obtiene la informacion de la configuracion de epayco
        $url_response = core()->getConfigData('sales.payment_methods.epayco.url_response');
        $url_confirmation = core()->getConfigData('sales.payment_methods.epayco.url_confirmation');
        $name_store = core()->getConfigData('sales.payment_methods.epayco.name_store');
        $testing_mode = core()->getConfigData('sales.payment_methods.epayco.testing_mode');

        //desactiva el carrito, impide que se pueda seguir creando ordenes
        Cart::deActivateCart();

        // Crea el objeto con la informacion necesaria para enviar a epayco
        $data =  [
            'name' => $name_store.'#'.$orderId,
            'description' => '',
            'invoice' => $orderId,
            'number_doc_billing' => '',
            'currency' => 'cop',
            'amount' => $cart->grand_total,
            'tax_base' => '0',
            'tax' => '0',
            'country' => 'co',
            'lang' => 'en',
            'external' => false,
            'test' => $testing_mode? true : false,
            'methodsDisable' => [""],
            'response' => $url_response,
            'confirmation' => $url_confirmation,
            'name_billing' => $cart->customer_first_name." ".$cart->customer_last_name ,
            'address_billing' => $allDataCart->billing_address->address ,
            'type_doc_billing' => '',
            'mobilephone_billing' => '',
            'number_doc_billing' => '',
            'email_billing' => $cart->customer_email
        ];

        return response()->json($data);

    }

    public function ipn(){
        return $this->ipnHelper->processIpn(request()->all());
    }

    public function success(Request $request){
        // Obtiene el referencia de la orden en epayco
        $ref_payco = $request->query('ref_payco');
        // Obtiene la informacion de la orden en epayco
        $options = [
            "ssl" => [
                "verify_peer" => app()->environment('local') ? false : true,
                "verify_peer_name" => app()->environment('local') ? false : true,
            ],
        ];
        $url = "https://secure.epayco.co/validation/v1/reference/".$ref_payco;
        $respJson = file_get_contents($url, false, stream_context_create($options));
        $resp = json_decode($respJson, true);
        // Si la orden no existe en epayco
        if(isset($resp["status"])){
            return redirect()->route('shop.checkout.cart.index');
        }else{
            // Si la orden existe en epayco
            session()->flash('order_id', $resp["data"]["x_id_invoice"]);
            return redirect()->route('shop.checkout.onepage.success');
        }
    }

}
