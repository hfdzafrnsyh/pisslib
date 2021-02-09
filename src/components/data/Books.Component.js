import React from "react";
import "./book.css";
import { Col , Row , Button , Modal } from "react-bootstrap";
import LoadImage from "./image/45.svg";
import { Redirect } from "react-router-dom";


class Books extends React.Component{

    
    constructor(props){
        super(props);

        this.state = {
            isLoading : false,
            books : [],
            show : false,
            redirect : false
        }
        this.onPesan = this.onPesan.bind(this);
    }


    setModalOpen(){
        this.setState({ show : true });
    }

    setModalClose(){
        this.setState({ show : false });
    }


    onPesan = () => {
        if(!sessionStorage.getItem('user')){
            this.setState({ redirect : true });
        }else{
          this.setModalOpen();
        }
    }

    componentDidMount(){
        
       let baseUrl = `http://localhost:8000/api`;
        
       fetch(`${baseUrl}/books`)
       .then( response => {
           return response.json();
       })
       .then(responseJson => {
           if(responseJson.error){
               console.log('error');
           }else{
                   
            this.setState({
                isLoading  : true,
                books : responseJson.data
            })

           }
       })
       .catch( error => {
           console.log(error);
       })
    }

    render(){

        const {  books,  isLoading } = this.state;
   
        const imageLink = "http://localhost:8000/wp-pisslib/image/books/";


        if(this.state.redirect){
          return (  <Redirect to={'/login'}/> )
        }

        if( isLoading == true) {
            
            return(

                <Col sm={12} >
                    
                <Row>
                        
                    {
                        books.slice(0,3).map( book => {
                            return(
                        
                                <Col lg={4}>
                                     <div className="card card-book o-hidden border-0 shadow-lg my-5">
                                     <img src={imageLink + book.image} className="card-img-top" alt="..."></img>
                                          <div className="card-body">
                                             <h5 className="card-title">{ book.namebook }</h5>
                                             <a href=""  className="btn btn-danger">Detail</a>
                                             <button type="submit" onClick={this.onPesan}   className="btn btn-success ml-3">Pesan</button>
                                     </div>  
                                   </div> 
                              </Col>
                             
                                
                               );
                        })
                    }
                 </Row>
             
             {/* modal */}
                 <Modal show={this.state.show}
                   size="md"
                   aria-labelledby="contained-modal-title-vcenter"
                   centered
                 >
                <Modal.Header>
                    <div className="modal-header">
                        <h5>Sewa Buku</h5>
                    </div>
                </Modal.Header>
                <Modal.Body>
                <div className="modal-body">
                   <form>
                       <div className="form-group">
                           <input type="text" placeholder="name" className="form-control" value={books.namebook}></input>
                       </div>
                      
                   </form>
                </div>

                </Modal.Body>
                <Modal.Footer>
                    <Button onClick={ () => {this.setModalClose()}}>Close</Button>
                </Modal.Footer>
            </Modal>

            </Col>
             
            );
    
          
        }else{
            return <div className="loading-books"><img src={LoadImage} alt="load-image"></img></div>
        }



        
        
    }


}


export default Books;