<div class="bg-pink-400 m-8"
     x-data="alpineActivityComponent()">
    {{-- Do your work, then step back. --}}
    <h2 class="text-2x underline">Activity Component</h2>

    <ul>
        <template x-for="activity in activities">
            <li x-text="activity"></li>
        </template>
    </ul>
</div>
@push('scripts')
    <script>
        {{--console.log({activities: @js($activities)});--}}
        // console.log(this.activities);

        window.alpineActivityComponent = function (action) {

            return {
                activities: @entangle('activities'),
                init() {
                    let $vm = this;
                    console.log(this.activities);
                },

                handleButtonClick() {


                },

            };
        }
    </script>
@endpush
