import React from "react";
import './nav.css';
import * as ReactBootStrap from "react-bootstrap";
import { Redirect } from "react-router-dom";

class Nav extends React.Component{

    constructor(props){
        super(props);
        this.state = {
            redirect : false 
        }

        this.onLogout = this.onLogout.bind(this);
    }


    onLogout(){
        sessionStorage.getItem('user' , '');
        sessionStorage.clear();
        this.setState({ redirect : true });
    }

    render(){

        if(this.state.redirect){
            return (<Redirect to={'/'} />); 
        }

    if(!sessionStorage.getItem('user')){
        
        return(
            <div>
            <ReactBootStrap.Navbar bg="primary" expand="lg">
            <ReactBootStrap.Navbar.Brand href="/" className="text-white ml-3"><h2><b>Pisslib</b></h2></ReactBootStrap.Navbar.Brand>
                <ReactBootStrap.Navbar.Toggle controls="basic-navbar-nav" />
                <ReactBootStrap.Navbar.Collapse id="basic-navbar-nav " >
                    <ReactBootStrap.Nav className="ml-auto justify-content-end">
                    <ReactBootStrap.Nav.Link href="/" className="text-white">Home</ReactBootStrap.Nav.Link>
                  <ReactBootStrap.Nav.Link href="/login" className="text-white">Login</ReactBootStrap.Nav.Link>
                  <ReactBootStrap.Nav.Link href="/signup" className="text-white">Register</ReactBootStrap.Nav.Link>
    
                    </ReactBootStrap.Nav>
                   
                </ReactBootStrap.Navbar.Collapse>
            </ReactBootStrap.Navbar>
          
            </div>
        );
    }else{
        return(
            <ReactBootStrap.Navbar bg="primary" expand="lg">
            <ReactBootStrap.Navbar.Brand href="/" className="text-white ml-3"><h2><b>Pisslib</b></h2></ReactBootStrap.Navbar.Brand>
                <ReactBootStrap.Navbar.Toggle controls="basic-navbar-nav" />
                <ReactBootStrap.Navbar.Collapse id="basic-navbar-nav " >
                    <ReactBootStrap.Nav className="ml-auto justify-content-end">
                    <ReactBootStrap.Nav.Link href="/" className="text-white">Home</ReactBootStrap.Nav.Link>
                    <ReactBootStrap.Nav.Link href="/dashboard" className="text-white">Dashboard</ReactBootStrap.Nav.Link>
                  <ReactBootStrap.Button type="submit" onClick={this.onLogout}className="text-white">Logout</ReactBootStrap.Button>
             
                    </ReactBootStrap.Nav>
                   
                </ReactBootStrap.Navbar.Collapse>
            </ReactBootStrap.Navbar>
          
        )
    }
    
    }
}

export default Nav;