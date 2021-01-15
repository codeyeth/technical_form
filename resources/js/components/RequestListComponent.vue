<template>
  <div class="user-profile__twoots-wrapper">
    <div class="requestCount">
      <h3 class="user-profile__username">
        Total Requests <b class="totalCount"> ( {{ requests.length }} ) </b>
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
  props:["authgood"],
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      requests: [],
      // authgood: "false",
    };
  },
  created() {
    this.fetchRequests();
    console.log(this.authgood);
    // Echo.join("chat").listen("RequestSent", (event) => {
    //   this.fetchRequests();
    //   console.log("Fetch Success!");
    // });

    Echo.channel("receiveRequest").listen("RequestSent", (e) => {
      this.fetchRequests();
      console.log(e);
    });

    
  },
  methods: {
    fetchRequests() {
      axios.get("requests").then((response) => {
        this.requests = response.data;
      });
    },
  },
};
</script>