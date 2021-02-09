import React from "react";
import { Link  , Redirect } from "react-router-dom";
import PostRegister from "../../../service/PostRegister";
import "./register.css";

class Register extends React.Component{
    constructor(props){
        super(props);

        this.state = {
            name : '',
            email : '',
            password : '',
            password_confirmation : '',
            redirect : false
        }

    
        this.onRegister = this.onRegister.bind(this);
        this.onChange = this.onChange.bind(this);
    }

    

    onChange = (event) => {
        const { name , value } = event.target; 
        this.setState({[name] : value});
    }

    onRegister(event){
        if(this.state.email && this.state.password){
            PostRegister('register' , this.state).then( (result) => {
                let responseJson = result;
    
                if(responseJson.user){
                    sessionStorage.setItem('user' , responseJson);
                    this.setState({redirect : true });
                }else{
                    console.log('register failed');
                }
                
            });
         }
        event.preventDefault();
    }



    render(){

        if(this.state.redirect){
            return (<Redirect to={'/dashboard'} />);
        }
        
        if(sessionStorage.getItem('user')){
            return (<Redirect to={'/dashboard'} />);
        }


        const { name , email , password , password_confirmation } = this.state;


        return(
                <div className="container">
              <div className="row justify-content-center">
                <div className="col-lg-6 mt-5 mb-5">
                <div className="card o-hidden border-0 shadow-lg my-5">
                    <div className="card-body p-0 bg-white">
                        <div className="row">
                            <div className="col-sm-12  register">
                                <div className="p-5">
                             
                                <div className="header-register">
                                    <h4><u>Register</u></h4>
                                </div>

                                <form onSubmit={this.onRegister}>


                                <div className="form-group">
                                <input type="text" className="form-control" required name="name" value={name} onChange={this.onChange}  placeholder="Name" ></input>
                                </div>

                                <div className="form-group">
                                <input type="email" className="form-control" required name="email"  value={email} onChange={this.onChange} placeholder="Email" ></input>
                                </div>

                                <div className="form-group">
                                <input type="password" className="form-control" required name="password"   value={password} onChange={this.onChange} placeholder="Password"  ></input>
                                </div>
                                <div className="form-group">
                                <input type="password" className="form-control" required name="password_confirmation" value={password_confirmation} onChange={this.onChange}   placeholder="Repeat Password"  ></input>
                                </div>

                                <div className="button-register">
                                    <button type="submit" className="btn btn-danger text-white">Register</button>
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

export default Register;

