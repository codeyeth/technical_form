<template>
  <div class="user-profile__twoots-wrapper">
    <div class="requestCount">
      <h3 class="user-profile__username">
        Total Requests <b class="totalCount"> ( {{ requests.length }} ) </b>

        <!-- <button @click="playNotif()">Click Me!</button> -->
      </h3>
    </div>

    <requestListChild
      v-for="(request, index) in requests"
      :key="index"
      :request="request"
      :authgood="authgood"
    >
    </requestListChild>
  </div>
</template>

<script>
import requestListChild from "./RequestListChildComponent";

export default {
  components: {
    requestListChild,
  },
  props: ["authgood"],
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      soundurl: "notif1.mp3",
      requests: [],
      // authgood: "false",
    };
  },
  created() {
    // this.playNotif();
    this.fetchRequests();
    console.log(this.authgood);

    // Echo.join("receiveRequest").listen("RequestSent", (event) => {
    //   this.fetchRequests();
    //   console.log("Someone has Opened our Portal!");
    // });

    Echo.channel("receiveRequest").listen("RequestSent", (e) => {
      this.fetchRequests();
      console.log(e);
      this.playNotif();
    });
  },
  methods: {
    fetchRequests() {
      axios.get("requests").then((response) => {
        this.requests = response.data;
      });
    },
    playNotif() {
      var audio = new Audio(this.soundurl);
      audio.play();
    },
  },
};
</script>