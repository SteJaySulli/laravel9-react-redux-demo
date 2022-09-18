import { createStore } from "redux"

const initialState = {

};

const store = createStore( (state = initialState, action) => {
    switch(action.type) {

        default:
            return state;
    }
});

export default store;