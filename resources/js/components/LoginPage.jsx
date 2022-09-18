import React from 'react';
import EmailInput from './EmailInput';
import PasswordInput from './PasswordInput';

export default function LoginPage(props) {
    return <div className="d-flex justify-content-center">
        <div className="card">
            <div className="card-body">
                <EmailInput />
                <PasswordInput />
                <div className="mt-2 d-flex flex-1 justify-content-between">
                    <div></div>
                    <button type="button" className="btn btn-primary">
                        Log In
                    </button>
                </div>
            </div>
        </div>
    </div>
}
