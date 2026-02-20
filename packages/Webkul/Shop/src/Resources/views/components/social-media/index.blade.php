<div class="flex justify-center space-x-4 mt-4">
    @if (core()->getConfigData('general.social-media.tiktok.content'))
        <a href="{{ core()->getConfigData('general.social-media.tiktok.content') }}" target="_blank" aria-label="Visitar nuestro perfil de TikTok">
            <img src="{{ bagisto_asset('images/social/tiktok-icon.svg') }}" alt="TikTok">
        </a>
    @endif

    @if (core()->getConfigData('general.social-media.instagram.content'))
        <a href="{{ core()->getConfigData('general.social-media.instagram.content') }}" target="_blank" aria-label="Visitar nuestro perfil de Instagram">
            <img src="{{ bagisto_asset('images/social/instagram-icon.svg') }}" alt="Instagram">
        </a>
    @endif

    @if (core()->getConfigData('general.social-media.facebook.content'))
        <a href="{{ core()->getConfigData('general.social-media.facebook.content') }}" target="_blank" aria-label="Visitar nuestra página de Facebook">
            <img src="{{ bagisto_asset('images/social/facebook-icon.svg') }}" alt="Facebook">
        </a>
    @endif

    @if (core()->getConfigData('general.social-media.youtube.content'))
        <a href="{{ core()->getConfigData('general.social-media.youtube.content') }}" target="_blank" aria-label="Visitar nuestro canal de YouTube">
            <img src="{{ bagisto_asset('images/social/youtube-icon.svg') }}" alt="YouTube">
        </a>
    @endif

    @if (core()->getConfigData('general.social-media.twitter.content'))
        <a href="{{ core()->getConfigData('general.social-media.twitter.content') }}" target="_blank" aria-label="Visitar nuestro perfil de Twitter">
            <img src="{{ bagisto_asset('images/social/twitter-icon.svg') }}" alt="Twitter">
        </a>
    @endif
</div>