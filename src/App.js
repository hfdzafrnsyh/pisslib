import { BrowserRouter as Router , Route , Switch } from "react-router-dom";
import Nav from "./components/nav/Nav.Component";
import './App.css';
import Login from './components/auth/login/Login.Component';
import Home from "./components/Home.Component";
import Welcome from "./components/welcome/Welcome.Component";
import Register from "./components/auth/register/Register.Component";
import Footer from "./components/Footer.Component";
import Notfound from "./components/status/Notfound.component";


function App() {
  return (
    <Router>
    <div className="App">
      <Nav/>
      <Switch>
        <Route exact path='/' component={Welcome}/>
        <Route path='/login' component={Login}/>
        <Route path="/dashboard" component={Home}/>
        <Route path="/signup" component={Register}/>
        <Route exact component={Notfound} />
      </Switch>
      <Footer/>
  </div>
  </Router>
  );
}

export default App;
