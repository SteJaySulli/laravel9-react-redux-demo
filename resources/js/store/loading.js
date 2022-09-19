import { createSlice } from "@reduxjs/toolkit";

export const loadingSlice = createSlice({
    name: "user",
    initialState:{
        value: true,
    },
    reducers: {
        setLoading: (state) => {
            state.value = true;
        },
        setLoaded: (state) => {
            state.value = false;
        }
    }
});

export const {
    setLoading,
    setLoaded
} = loadingSlice.actions;

export default loadingSlice.reducer;