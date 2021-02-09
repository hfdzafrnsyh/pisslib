import React from "react"
import Books from "../data/Books.Component";
import Search from "../search/Search.Component";


class Welcome extends React.Component{
    render(){
        return(
            <div className="container">
                 <Search/>
             <div className="book-component">
               
                    <Books/>
                   
                </div>
           </div>
        );
    }
}


export default Welcome;