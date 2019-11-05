<template>
    <div id="app">
        <img alt="Vue logo" src="./assets/logo.png">
        <!--        <HelloWorld msg="Welcome to Your Vue.js App"/>-->
        <!--        <ThisTest></ThisTest>-->
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
                count: 0,
                out: "data-out",
                hosts: [{hostname: "a"}, {hostname: "b"}, {hostname: "c"}]
            }
        },
        mounted: function () {
            this.start();
        },
        methods: {
            start: function () {
                this.loop();
            },
            loop() {
                this.hosts.forEach(function (item, index) {
                    console.log(this.out);
                    this.funcA(item);
                }.bind(this));
            },
            funcA(item) {
                let str = item.hostname;
                console.log("funcA " + str);
                setTimeout(function () {
                    console.log("funcA timeout " + str);
                    console.log(this.out);
                    this.funcB();
                    this.axios.get("http://localhost/a.php", {
                        headers: {
                        },
                        withCredentials: false
                    })
                        .then(function (response) {
                            console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }.bind(this), 500);
            },
            funcB: function () {
                console.log("funcB is replacing out...");
                this.out = "replaced-out";
                this.funcC();
            },
            funcC() {
                console.log("funcC put out - " + this.out)
            }
        }
    }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
