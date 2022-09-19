import React from 'react';

export default function LogoutBar(props) {
    const {user, onLogout} = props;

    return <div className="d-flex bg-white flex-grow-1 justify-content-between align-items-center p-2">
    <div>
        Welcome {user.name}
    </div>
    <div>
        <button type="button" className="btn btn-info" onClick={onLogout}>
            Log Out
        </button>
    </div>
</div>
}