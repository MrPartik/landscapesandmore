@component('mail::message')
    Hi {{ $name }}!.

    {{ $body }}


     -  Michelangelo’s Sustainable Landscaping Design Group

    {{ __('If you did not expect to receive this email, you may discard this email.') }}
@endcomponent
