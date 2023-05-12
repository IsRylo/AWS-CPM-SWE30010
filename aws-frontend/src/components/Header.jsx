import { Link } from "react-router-dom";
import Logo from "./Logo";

function Header(handleTitleChange){
    return(
        <nav className="navbar">
            <ul><Link to="/" onClick={() => handleTitleChange('Default Title')}> <Logo/> </Link></ul>
            <ul><Link to="/register" onClick={() => handleTitleChange('Register')}>Register Form</Link></ul>
            <ul><Link to="/login" onClick={() => handleTitleChange('Login Form')}>Login Form</Link></ul>
        </nav>
    );
}

export default Header;