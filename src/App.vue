<template>
    <div id="app">
        open console
    </div>
</template>

<script>
    // import HelloWorld from './components/HelloWorld.vue';
    // import ThisTest from './components/ThisTest.vue';

    export default {
        name: 'app',
        // components: {
        //     // HelloWorld
        //   ThisTest
        // }
        data: function () {
            return {
                selectedHosts: [{hostname: "a"}, {hostname: "b"}, {hostname: "c"}],
                form: {return_now: "yes", removed_verda: "Finished"}
            }
        },
        mounted: function () {
            this.postAnswerLoop(); // 実行
        },
        methods: {
            async postAnswerLoop() {
                console.log('start');
                let num = 0;
                for (let i = 0; i <= this.selectedHosts.length - 1; i++) {
                    num = await this.postAnswerEachHost(this.selectedHosts[i]);
                    console.log('postAnswerLoop(): promise result is ' + num); // ここは同期実行できてるか確認するためのものです。
                }
                // promiseすべて終わったら呼ばれる
                this.finishSurvey()
            },
            postAnswerEachHost(item) {
                return new Promise((resolve, reject) => {
                    var hostname = item.hostname;
                    setTimeout(function () {
                        console.log("postAnswerEachHost timeout " + hostname);

                        let url = `http://localhost/a.php?hostname=${hostname}`;
                        let data = this.form;
                        data.headers = {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                            'Access-Control-Allow-Origin': '*',
                            "Access-Control-Allow-Headers" : "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"
                        }
                        data.withCredentials = false;

                        this.axios.post(url, data)
                            .then(function (response) {
                                console.log(response);
                                return resolve(`hostname=${hostname} status=${response.status}`);
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    }.bind(this), 50);
                });
            },
            finishSurvey() {
                console.log('\ndone----------------');
                console.log(this.selectedHosts);
            },
        }
    }
</script>
