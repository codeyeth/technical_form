<template>
  <div class="twoot-item">
    <div class="user-profile__twoot">
      <div class="twoot-item__user">
        <div class="twoot-item__content">
          <span class="item_new">NEW REQUEST</span>

          TECH SUPPORT NO: <b> {{ request.ts_no }} </b>
          <hr />
        </div>

        <div class="twoot-item__content">
          <div class="twoot-item__content1">
            <h3><u> Employee Request Information </u></h3>
            DATE/TIME:
            <b>
              {{ moment(request.date).format("MMMM Do YYYY, h:mm:ss") }} |
              {{ moment(request.date).fromNow() }}
            </b>

            <br />
            REQUESTING DIVISION/SECTION: <b> {{ request.req_div }} </b>
            <br />
            REQUESTING EMPLOYEE: <b> {{ request.req_emp }} </b>
            <br />
            PROBLEM CATEGORY: <b> {{ request.prob_cat }} </b>
            <br />
            DESCRIPTION: <b> {{ request.description }} </b>

            <hr />

            <a :href="'editRequest/' + request.id + '/edit'" type="button" class="btn btn-primary" v-if="authgood">
              UPDATE TECH REQUEST
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  name: "requestListChild",
  props: ["request", "authgood"],
  data() {
    return {
      moment,
    };
  },
};
</script>

 <style scoped>
.twoot-item {
  padding: 20px;
  background-color: white;
  border-radius: 5px;
  border: 1px solid #dfe3e8;
  box-sizing: border-box;
  cursor: pointer;
  transition: all 0.25s ease;
}

.item_new {
  padding: 5px 20px;
  font-weight: bold;
  background-color: red;
  color: white;
}

.item_done {
  padding: 5px 20px;
  font-weight: bold;
  background-color: #06a40b;
  color: white;
}

.tsNo {
  padding: 5px 20px;
  font-weight: bold;
  background-color: #4682b4;
  color: white;
}

.item_old {
  display: none;
}
.twoot-item:hover {
  transform: scale(1.1, 1.1);
}

.twoot-item__content {
  /* display: grid;
            grid-gap: 50px;
            grid-template-columns: 3fr 1fr; */
  padding: 10px 5%;
}
</style>
    