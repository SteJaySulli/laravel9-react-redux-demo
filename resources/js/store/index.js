import { configureStore } from "@reduxjs/toolkit";
import userReducer from "./user";
import loadingReducer from "./loading";
import usersReducer from './users';

export default configureStore({
    reducer: {
        loading: loadingReducer,
        user: userReducer,
        users: usersReducer,
    },
});