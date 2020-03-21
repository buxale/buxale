<div>
    <div class="card">
        <div class="card-header">API Keys</div>
        <div class="card-body">
            @if(! count($apiKeys))
                {{__('Noch kein API Token vorhanden')}}
            @else
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Zuletzt verwendet')}}</th>
                    <th scope="col">{{__('Erstellt')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($apiKeys AS $apiKey)
                    <tr>
                        <th scope="row">{{$apiKey->id}}</th>
                            <td>{{$apiKey->name}}</td>
                            <td>{{$apiKey->last_used_at}}</td>
                            <td>{{$apiKey->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            @if(! empty($plainTextToken))
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">{{__('Ihr neuer API Key')}}</h4>
                        {{$plainTextToken}}
                    </div>
            @endif

                <div>
                    @if(! empty($apiKeys))
                        <button type="button" class="btn btn-danger mr-2" wire:click="deleteApiKeys">{{__('Alle keys löschen')}}
                    </button>
                    @endif
                    <button type="button" class="btn btn-primary" wire:click="generateApiKey">{{__('Neuen API Token
                        generieren')}}
                    </button>
                </div>
        </div>
    </div>
</div>
