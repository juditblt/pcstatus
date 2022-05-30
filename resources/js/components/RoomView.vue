<template>
    <!-- ROOM - {{ this.id }} -->
    <hr>
    <div v-if="isLoaded">
        <div>
            <h4>{{ room.name }} - Terem</h4>
        </div>
        <div>
            <small>{{ room }}</small>
        </div>
        <div>
            <h6 @click="showLayout = !showLayout">Eszközök
                - {{deviceCountByStatus("ok")}}
                - {{deviceCountByStatus("need_repair")}}
                - {{deviceCountByStatus("repair")}}</h6>
        </div>
        <div v-if="showLayout">
            <room-layout-view
                :width="room.width"
                :height="room.height"
                :devices="room.devices">
            </room-layout-view>
        </div>
    </div>
</template>

<script>
import RoomLayoutView from "./roomview/RoomLayoutView.vue";
export default {
    name: "RoomView",
    components: {
        RoomLayoutView
    },
    props: {
        id: {
            type: Number,
            default: 0
        }
    },
    data() {
        return {
            isLoaded: false,
            showLayout: false,
            room: {
                id: this.id,
                name: "-name-",
                width: 0,
                height: 0,
                devices: []
            }
        };
    },
    methods: {
        getRoomData(){
            console.log("RoomView - download data - " + this.room.id);
            this.axios
                .get('/api/room/' + this.id)
                .then((response) => {
                    console.log(response.data);
                    if (this.room.id === response.data.id) {
                        this.room = response.data;
                        this.isLoaded = true;
                        //console.log(this.room);
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        deviceCountByStatus(status) {
            let c = 0;
            this.room.devices.forEach(function (device){
                if (device.status === status){
                    c++;
                }
            });
            return c;
        }
    },
    mounted() {
        this.getRoomData();

    }
}
</script>

<style scoped>

</style>
