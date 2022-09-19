import React from 'react';

export default function EmailInput(props) {
    
    return <div className="input-group my-1">
        <div className="input-group-prepend">
            <span className="input-group-text" style={{width: "100px"}}>
                E-mail:
            </span>
        </div>
        <input {...props} type="email" className="form-control" />
    </div>
}