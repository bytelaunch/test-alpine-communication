<div class="bg-pink-400 m-8"
     @create-bid.window="handleButtonClick"
     x-data="alpineActivityComponent()"
>

    <h2 class="text-2x underline"><span x-text="title"></span></h2>

    <ul>
        <template x-for="activity in activities" :key="activity.key">
            <li>
                <span class="text-gray-500" x-text="activity.receivedAtHuman"></span>
                -
                <span
                    x-text="activity.activityString" ></span>

            </li>
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
                    let activityStr = 'James placed a bid (from Alpine)';
                    this.activities.push({ key: makeid(4), activityString: activityStr, receivedAtHuman: 'now' });
                    this.$wire.createActivity(activityStr);
                },

            };
        }
        function makeid(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }

    </script>
@endpush
