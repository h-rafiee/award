import axios from "axios";

export default {
  get({ commit }, page = 1) {
    return new Promise((resolve, reject) => {
      axios
        .get("/api/winners", {
          params: {
            page,
          }
        })
        .then((res) => {
          commit("SET_ITEMS", res.data.data);
          resolve(res);
        })
        .catch((err) => reject(err));
    });
  },
};
