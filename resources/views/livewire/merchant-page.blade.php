<div class="py-10 container mx-auto flex justify-center">
    <div class="rounded w-full lg:w-2/3 bg-white shadow p-4 px-24 text-center">
        <div class="flex justify-center my-6">
            <img class="h-12 w-auto" src="/img/buxale-logo.png" alt=""/>
        </div>
        <h1 class="font-bold text-3xl">Unterstütze mich mit einem Gutschein</h1>

        <div class="font-bold my-2">
            Du bist auf der seite von: {{$company_name}}
        </div>

        @if($checkout_token)
            <span>Wir sind aufgrund der aktuellen Gegebenheiten von unserem Alltag abgehalten.
        Um euch aber auch nach der Krise unsere Leistungen noch weiter Anbieten zu können,
        würden wir uns über den Vorkauf von Gutscheinen freuen.</span>


            <div class="flex justify-center">
                <buxale-button
                        api_token="{{ $checkout_token }}"
                        success_url="{{url()->full()}}" cancel_url="{{url()->full()}}"
                        custom_amount="1"
                        amount="{{$amount}}"/>
            </div>
        @else
            <span>Dieser Händler hat seinen Checkout noch nicht aktiviert.</span>
        @endif
    </div>
</div>

