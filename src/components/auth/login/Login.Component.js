import React from "react";
import { Link, Redirect } from "react-router-dom";
import PostLogin from "../../../service/PostLogin";
import "./login.css";

class Login extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            email : '',
            password : '',
            redirect : false
        }

        this.onLogin = this.onLogin.bind(this);
        this.onChange = this.onChange.bind(this);
    }

    onLogin = (event) => {
     if(this.state.email && this.state.password){
        PostLogin('login' , this.state).then( (result) => {
            let responseJson = result;

            if(responseJson.user){
                sessionStorage.setItem('user' , responseJson);
                this.setState({redirect : true });
            }else{
                console.log('email or passoword incorect');
            }
            
        });
     }
        event.preventDefault();
    }

    onChange = (event) => {
        const { name , value } = event.target; 
        this.setState({[name] : value});
    }
    
    render(){

        if(this.state.redirect){
            return (<Redirect to={'/dashboard'} />);
        }
        
        if(sessionStorage.getItem('user')){
            return (<Redirect to={'/dashboard'} />);
        }

        const { email , password } = this.state;
        return(
                <div className="container">
                    <div className="row justify-content-center">
                <div className="col-lg-6 mt-5 mb-5">
                <div className="card o-hidden border-0 shadow-lg my-5">
                    <div className="card-body p-0 bg-white">
                        <div className="row">
                            <div className="col-sm-12  login">
                                <div className="p-5">
                                <div className="header-login">
                                    <h4><u>Login</u></h4>
                                </div>
                                <form onSubmit={this.onLogin}>

                                <div className="form-group">
                                <input type="email" className="form-control" required value={email}  name="email" onChange={this.onChange} placeholder="Email" ></input>
                                </div>

                                <div className="form-group">
                                <input type="password" className="form-control"  required value={password} name="password"  onChange={this.onChange} placeholder="Password"  ></input>
                                </div>

                                <div className="button-login">
                                    <button type="submit" className="btn btn-danger text-white">Login</button>
                                </div>
                                    <Link to='/' >Back?</Link>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                </div>
            </div>
        );
    }
}


export default Login;