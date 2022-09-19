import { createSlice } from "@reduxjs/toolkit";

export const userSlice = createSlice({
    name: "user",
    initialState:{
        id: null,
        name: null,
        email:null,
    },
    reducers: {
        changeUser: (state, action) => {
            state.id = action.payload.user_id;
            state.name = action.payload.name;
            state.email = action.payload.email;
        }
    }
});

export const {
    changeUser
} = userSlice.actions;

export default userSlice.reducer;