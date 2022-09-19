import axios from 'axios';
import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { setUsers } from '../store/users';

function formatBadge(badge) {
    return badge.split("_")
        .map((word) => word.substring(0, 1).toLocaleUpperCase() + word.substring(1).toLocaleLowerCase())
        .join(" ");
}

export default function UserListPage(props) {
    const { onSelectUser } = props;
    const list = useSelector((state) => state.users.list);
    const dispatch = useDispatch();

    useEffect(() => {
        axios.get(route('api.users'))
            .then(({ data: { data } }) => {
                dispatch(setUsers({ list: data }));
            }).catch(error => {
                throw error;
            })
    }, []);

    return <table className="bg-white table table-sm user-select-none">
        <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Roles</th>
                <th>No. Accounts</th>
                <th style={{ width: "0px" }}></th>
            </tr>
        </thead>
        <tbody>
            {!!list && list.map((user, userIndex) => <tr
                key={userIndex}
                class="clickable-row"
                onClick={() => onSelectUser(user.accounts)}
            >
                <td>{user.name}</td>
                <td>{user.email}</td>
                <td>{user.roles.map((role, roleIndex) => <div className="badge bg-secondary m-1">{formatBadge(role)}</div>)}</td>
                <td>{user.accounts ? user.accounts.length : 0}</td>
                <td><button className="btn btn-sm btn-primary" type="button" onClick={() => onSelectUser(user.accounts)}>Accounts</button></td>
            </tr>)}
        </tbody>
    </table>
}