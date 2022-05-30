<template>
    <img @click.exact="loadDogImg" @click.ctrl="loadImg" :src="src" alt="">
</template>

<script>
export default {
    name: "AnimalImage",
    data() {
        return {
            src: "",
        };
    },
    methods: {
        loadImg(){
            console.log("load image");
            this.axios
                .get('https://api.thecatapi.com/v1/images/search')
                .then((response) => {
                    console.log(response.data[0].url);
                    this.src = response.data[0].url;
                })
                .catch(() =>{
                    console.log("Sikertelen API hívás!");
                });
        },
        loadDogImg(){
            console.log("load dog image");
            this.axios
                .get('https://api.thedogapi.com/v1/images/search')
                .then((response) => {
                    console.log(response.data[0].url);
                    this.src = response.data[0].url;
                })
                .catch(() =>{
                    console.log("Sikertelen API hívás!");
                });
        }
    },
    mounted() {
        console.log("Animal Image ...");
        this.loadImg();
    }
}
</script>

<style scoped>

</style>
