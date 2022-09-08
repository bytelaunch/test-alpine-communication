<div class="bg-pink-400 m-8 p-2"  x-data="{ open: false }">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <h2 class="text-2x underline mb-2">Bid Component</h2>
    <button
        wire:click="createBid"
            @click="$dispatch('create-bid', 'Hello World!')" class="bg-gray-50 p-2 rounded">Create a bid</button>
</div>
