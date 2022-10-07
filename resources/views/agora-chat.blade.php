<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agora Chat') }}
        </h2>
    </x-slot>

    <script type="module" src="{{ asset('js/main.js') }}"></script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="left-align">Get started with video calling</h2>
                    <input type="text" name="appID" id="appID" value="{{ $appID }}" />
                    <input type="text" name="channelName" id="channelName" value="{{ $channelName }}" />
                    <input type="text" name="agoraToken" id="agoraToken" value="{{ $token }}" />
                    <input type="text" name="uid" id="uid" value="{{ $uid }}" />
                    <br>
                    <br>
                    <br>

                    <div class="row">
                        <div>
                            <button type="button" id="join" class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                                Join
                            </button>
                            <button type="button" id="leave" class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                                Leave
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <agora-chat :allusers="{{ $users }}" authuserid="{{ auth()->id() }}" authuser="{{ auth()->user()->name }}"
        agora_id="{{ env('AGORA_APP_ID') }}" /> --}}
</x-app-layout>
