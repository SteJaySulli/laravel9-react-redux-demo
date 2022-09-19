import { createSlice } from "@reduxjs/toolkit";

export const usersSlice = createSlice({
    name: "users",
    initialState:{
        list: [],
    },
    reducers: {
        setUsers: (state, action) => {
            state.list = [...action.payload.list];
        }
    }
});

export const {
    setUsers
} = usersSlice.actions;

export default usersSlice.reducer;