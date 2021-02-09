import React from "react";
import { Redirect } from "react-router-dom";

class Home extends React.Component{

    constructor(props){
        super(props);
        this.state = {
            redirect : false
        }
        this.logout = this.logout.bind(this);
    }

    componentWillUnmount(){
        if(sessionStorage.getItem('user')){
            console.log('Your Login');
        }else{
            this.setState({ redirect : true});
        }
    }


    logout(){
        sessionStorage.getItem('user' , '');
        sessionStorage.clear();
        this.setState({ redirect : true});
    }

    render(){
        
        if(this.state.redirect){
            return (<Redirect to={'/'} />);
        }

        if(sessionStorage.getItem('user')){
         
            return(
                <div className="home-page">
                    <h3>ini home</h3>
                    <button type="submit" className="btn btn-danger" onClick={this.logout}>Logout</button>
                </div>
            );
        }else{
            return ( <Redirect to={'/login'} />)
        }

    }
}

export default Home;