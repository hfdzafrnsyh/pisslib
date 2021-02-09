import React from "react";
import "./search.css";

class Search extends React.Component{
    constructor(props){
        super(props);
        
        this.state = {
            search : ""
        }
        this.onSearch = this.onSearch.bind(this);
    }

    onSearch(event) {
        console.log(event.target.value);
        this.setState({ search : event.target.value })
       
    }


    render(){


        return(
            <div className="search-component">
                <div className="logo">
                    <h1><u>PISSLIB</u></h1>
                  
                    <div className="logo-text">
                    <p>Find Books and then rent </p>
                  </div>
                </div>
                
            
                <div className="search" >
            
                <form onChange={this.onSearch}>
                <input action="search" type="text" id="search" placeholder="Search Book.."></input>
                <button type="submit" >SEARCH</button>
                </form>

                </div>

                <div id="text-search"></div>
            </div>
        );
    }
}


export default Search;