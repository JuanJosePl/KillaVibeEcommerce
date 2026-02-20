<div>
    <div class="fixed right-5 lg:right-14 bottom-10 xl:right-10 lg:bottom-14 z-50">
        <a href="https://api.whatsapp.com/send?phone={{ core()->getConfigData('general.general.whatsapp.number') }}&text={{ core()->getConfigData('general.general.whatsapp-mensaje.description') }}"
            class="cursor-pointer animated bounce rounded-full bg-green-600 h-16 w-16 lg:h-16 lg:w-16 flex items-center justify-center hover:scale-90 duration-200"
            target="_blank" aria-label="Chatear por WhatsApp">>
            <span class="animate-ping absolute top-0 right-1.5 inline-flex h-4 w-4 rounded-full bg-red-400 opacity-75 z-30"></span>
            <span class="absolute top-1 right-2 inline-flex rounded-full h-3 w-3 bg-red-500 bg-opacity-90"></span>
            <svg class="h-11 w-11" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
            </svg>
        </a>
    </div>
</div>
