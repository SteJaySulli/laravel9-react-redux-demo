import axios from 'axios';
import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { setUsers } from '../store/users';

export default function UserListPage(props) {
    const list = useSelector((state) => state.users.list);
    const dispatch = useDispatch();

    useEffect(() => {
        axios.get(route('api.users'))
            .then(({ data: { data } }) => {
                console.log(data);
                const { users, accounts } = data.reduce((acc, user) => {
                    acc.users.push({
                        id: user.id,
                        name: user.name,
                        email: user.email,
                        accounts: user.accounts ? user.accounts.length : 0,
                    });
                    if (user.accounts) {
                        user.accounts.forEach(account => {
                            acc.accounts[account.id] = account;
                        });
                    }
                    return acc;
                }, {
                    users: [],
                    accounts: {}
                });

                dispatch(setUsers({ list: users }));
                console.log("Accounts", accounts);
            }).catch(error => {
                throw error;
            })
    }, []);

    return <table className="bg-white table table-sm table-striped user-select-none">
        <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>No. Accounts</th>
            </tr>
        </thead>
        <tbody>
            {!!list && list.map(user => <tr class="clickable-row" onClick={() => console.log("Selected user ", user.id)}>
                <td>{user.name}</td>
                <td>{user.email}</td>
                <td>{user.accounts}</td>
            </tr>)}
        </tbody>
    </table>
}