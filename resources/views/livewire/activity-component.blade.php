<div class="bg-pink-400 m-8"
     @create-bid.window="handleButtonClick"
     x-data="alpineActivityComponent()"
>

    <h2 class="text-2x underline"><span x-text="title"></span></h2>

    <ul>
        <template x-for="activity in activities">
            <li x-text="activity"></li>
        </template>
    </ul>
</div>
@push('scripts')
    <script>

        window.alpineActivityComponent = function (action) {

            return {
                title: 'Activity Component',
                activities: @entangle('activities'),
                init() {
                    let $vm = this;
                    console.log(this.activities);
                },

                handleButtonClick() {
                    console.log('handleButtonClick');
                    this.activities.push('James placed a bid (from Alpine)');

                },

            };
        }
    </script>
@endpush
