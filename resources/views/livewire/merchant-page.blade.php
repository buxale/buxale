<div class="py-10 container mx-auto flex justify-center">
    <div class="rounded w-full lg:w-2/3 bg-white shadow border border-gray-200 p-24 px-24 text-center">
        <div class="flex justify-center my-6">
            <img class="h-12 w-auto" src="/img/buxale-logo.png" alt=""/>
        </div>
        <h1 class="font-bold text-3xl font-headings">Unterstütze mich mit einem Gutschein</h1>

        <div class="font-bold my-8 ">
            Du bist auf der seite von: {{$company_name}}
        </div>

        @if($checkout_token)
            <div class="w-full md:w-3/4 mx-auto">
            <span class="">Auch wir werden leider aufgrund der aktuellen Gegebenheiten von unserem Alltag abgehalten.<br><br>
            Da wir euch auch nach der Krise weiterhin unsere Leistungen anbieten möchten, freuen wir uns über jeden verkauften Gutschein</span>
            </div>


            <div class="flex justify-center mt-6">
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

