import React from 'react';
import { useDispatch, useSelector } from 'react-redux';
import {selectUser} from '../store/selectedUser';

export default function BankAccountLsitPage(props) {
    const accounts = useSelector( (state) => state.selectedUser.accounts)
    const dispatch = useDispatch();

    return <>
        <div className="d-flex justify-content-between align-items-center bg-white p-2">
            <button className="btn btn-primary" type="button" onClick={() => {
                dispatch(selectUser({accounts:null}));
            }}>
                Back To User List
            </button>
            <div>
                <strong>Note:</strong>&nbsp;
                Sensitive account details are redacted for security
            </div>
        </div>
        <table className="bg-white table table-sm user-select-none">
            <thead>
                <tr>
                    <th>Account Name</th>
                    <th>Account Number</th>
                    <th>Sort Code</th>
                    <th>Card Number</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                {!!accounts && accounts.map((account, index) => <tr
                    key={index}
                >
                    <td>{account.name}</td>
                    <td>{account.number}</td>
                    <td>{account.sort_code}</td>
                    <td>{account.card_number}</td>
                    <td>{account.expires_at}</td>
                </tr>)}
            </tbody>
        </table>
    </>
}