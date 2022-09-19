import React, { useState } from 'react';

export default function PasswordInput(props) {
    const [show, setShow] = useState(false);
    return <div className="input-group my-1">
        <div className="input-group-prepend">
            <span className="input-group-text" style={{width: "100px"}}>
                Password:
            </span>
        </div>
        <input {...props} type={show ? "text" : "password"} className="form-control" />
        <div className="input-group-append">
            <button type="button" className="btn btn-secondary" onClick={()=>setShow(!show)}>
                {show ? "Hide" : "Show"}
            </button>
        </div>
    </div>
}