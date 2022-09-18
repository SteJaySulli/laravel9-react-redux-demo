import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import store from './store';
import LoginPage from "./LoginPage";

export default function App(props) {

    return <>
        <LoginPage />
    </>
}

const container = document.getElementById("react-app");
console.log("container:", container)
if(container) {
    // const root = createRoot(container);
    render(
    <Provider store={store}>
        <App />
    </Provider>
    , container
    );
}