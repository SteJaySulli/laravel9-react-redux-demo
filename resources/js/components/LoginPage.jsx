import React, { useState } from 'react';
import axios from 'axios';
import EmailInput from './EmailInput';
import PasswordInput from './PasswordInput';

export default function LoginPage(props) {
    const {onLogin} = props;
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState(null);

    return <div className="d-flex justify-content-center">
        <div className="card">
            <div className="card-body">
                {!!error && <div className="alert alert-danger mb-2">
                    {error}
                </div>}
                <EmailInput value={email} onChange={event => setEmail(event.target.value)} />
                <PasswordInput value={password} onChange={event => setPassword(event.target.value)} />
                <div className="mt-2 d-flex flex-1 justify-content-between">
                    <div></div>
                    <button type="button" className="btn btn-primary" onClick={() => {
                        setError(null);
                        axios.post(route("api.auth.login"), {
                            email, password
                        }).then( response => {
                            onLogin();
                        }).catch( ({response}) => {
                            const {data:{message}} = response;
                            const {data:{errors:{email}}} = response;
                            if(!!message || !!email ) {
                                setError(message ?? email);
                            } else {
                                setError("An error occured while trying to log in.");
                            }
                        })
                    }}>
                        Log In
                    </button>
                </div>
            </div>
        </div>
    </div>
}
