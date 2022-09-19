import React, { useEffect, useState } from 'react';
import { render } from 'react-dom';
import { Provider, useDispatch, useSelector } from 'react-redux';
import store from '../store';
import LoginPage from "./LoginPage";
import { changeUser } from '../store/user';
import { setLoaded, setLoading } from '../store/loading';
import { selectUser } from '../store/selectedUser';
import axios from 'axios';
import Spinner from '../components/Spinner';
import LogoutBar from '../components/LogoutBar';
import UserListPage from './UserListPage';
import BankAccountLsitPage from './BankAccountListPage';

export default function App(props) {
    const loading = useSelector((state) => state.loading.value);
    const user = useSelector((state) => state.user);
    const selected = useSelector((state) => state.selectedUser.accounts);
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(setLoading());
        axios.get(route("api.auth.user"))
            .then(({ data }) => {
                dispatch(changeUser(data));
                dispatch(setLoaded());
            })
            .catch((error) => {
                throw error;
            });
    }, [])

    if (loading) {
        return <div className="card">
            <div className="card-body d-flex justify-content-center flex-column">
                <Spinner />
                Loading...
            </div>
        </div>
    }

    if (!user.id) {
        return <LoginPage onLogin={(user) => dispatch(changeUser(user))} />
    }

    return <div className="container">
        <LogoutBar user={user} onLogout={() => { dispatch(changeUser({})) }} />
        {!!selected ? <BankAccountLsitPage /> : <UserListPage onSelectUser={ accounts => dispatch(selectUser({accounts}))}/>}
    </div>
}

const container = document.getElementById("react-app");
console.log("container:", container)
if (container) {
    render(
        <Provider store={store}>
            <App />
        </Provider>
        , container
    );
}