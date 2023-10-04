<div class="flex flex-row items-center justify-between py-2 text-gray-600">
    <hr class="w-full mr-2">
    {{ __('Or') }}
    <hr class="w-full ml-2">
</div>

<div class="flex items-center justify-center">
    @if (JoelButcher\Socialstream\Socialstream::hasBitbucketSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::bitbucket()]) }}">
            <x-socialstream-icons.bitbucket />
            <span class="sr-only">BitBucket</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasFacebookSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::facebook()]) }}">
            <x-socialstream-icons.facebook class="w-6 h-6 mx-2" />
            <span class="sr-only">Facebook</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasGithubSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::github()]) }}">
            <x-socialstream-icons.github class="w-6 h-6 mx-2" />
            <span class="sr-only">GitHub</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasGitlabSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::gitlab()]) }}">
            <x-socialstream-icons.gitlab class="w-6 h-6 mx-2" />
            <span class="sr-only">GitLab</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasGoogleSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::google()]) }}">
            <x-socialstream-icons.google class="w-6 h-6 mx-2" />
            <span class="sr-only">Google</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasLinkedInSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::linkedin()]) }}">
            <x-socialstream-icons.linkedin class="w-6 h-6 mx-2" />
            <span class="sr-only">LinkedIn</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasLinkedInOpenIdSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::linkedinOpenId()]) }}">
            <x-socialstream-icons.linkedin class="w-6 h-6 mx-2" />
            <span class="sr-only">LinkedIn</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasSlackSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::slack()]) }}">
            <x-socialstream-icons.slack class="w-6 h-6 mx-2" />
            <span class="sr-only">Slack</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasTwitterOAuth1Support())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::twitter()]) }}">
            <x-socialstream-icons.twitter class="w-6 h-6 mx-2" />
            <span class="sr-only">Twitter</span>
        </a>
    @endif

    @if (JoelButcher\Socialstream\Socialstream::hasTwitterOAuth2Support())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::twitterOAuth2()]) }}">
            <x-socialstream-icons.twitter class="w-6 h-6 mx-2" />
            <span class="sr-only">Twitter</span>
        </a>
    @endif
</div>
