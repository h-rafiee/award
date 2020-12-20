import state from "./moduleWinnerState.js";
import mutations from "./moduleWinnerMutations.js";
import actions from "./moduleWinnerActions.js";
import getters from "./moduleWinnerGetters.js";

export default {
  isRegistered: false,
  namespaced: true,
  state,
  mutations,
  actions,
  getters,
};
