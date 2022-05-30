<template>
    Kutyulínó
    <br>
    <label for="choose">Válassz típust:</label>
    <select name="" id="choose" v-model="selected_breed">
        <option v-for="breed in breeds"
                :value="breed">{{ breed.breed_group}} / {{ breed.name }}
        </option>
    </select>
    <br>
    <img v-if="selected_breed"
        :src="selected_breed.image.url"
        :alt="'Kiválasztott fajta - ' + selected_breed.name"
        style="height: 300px;">
    <br>
    <table v-if="selected_breed">
        <tr>
            <td>Átlagos súly:</td>
            <td>{{ selected_breed.weight.metric}}</td>
        </tr>
        <tr>
            <td>Átlagos magasság:</td>
            <td>{{ selected_breed.height.metric}}</td>
        </tr>
        <tr>
            <td>Jellemzők:</td>
            <td>{{ selected_breed.temperament}}</td>
        </tr>
    </table>
    <hr>
    <div v-if="selected_breed">
        <button @click="getImages">Képek kérése</button>
        <div v-for="image in images">
            <img :src="image.url" alt="" style="height: 300px;">
        </div>
    </div>

</template>

<script>
export default {
    name: "AdvancedAnimal",
    data() {
        return {
            selected_breed: null,
            breeds: [],
            images: []
        };
    },
    methods: {
        getBreeds() {
            this.axios
                .get('https://api.thedogapi.com/v1/breeds')
                .then((response) => {
                    this.breeds = response.data;
                })
                .catch(() => {
                    console.log("API HIBA!");
                });
        },
        getImages() {
            this.axios
            .get('https://api.thedogapi.com/v1/images/search?breed_ids=' + this.selected_breed.id + '&limit=5')
            .then((response) => {
                this.images = response.data;
                console.log(response.data);
            })
            .catch(() => {
                console.log("API HIBA!");
            });
        }
    },
    mounted() {
        this.getBreeds();
    }
}
</script>

<style scoped>

</style>
