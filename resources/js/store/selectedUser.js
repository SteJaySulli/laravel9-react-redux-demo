import { createSlice } from "@reduxjs/toolkit";

export const selectedUserSlice = createSlice({
    name: "selectedUser",
    initialState:{
        accounts: null,
    },
    reducers: {
        selectUser: (state, action) => {
            state.accounts = action.payload.accounts;
        }
    }
});

export const {
    selectUser
} = selectedUserSlice.actions;

export default selectedUserSlice.reducer;