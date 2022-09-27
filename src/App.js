import React from 'react';
import './App.css';
import { BrowserRouter as Router , Switch, Route} from 'react-router-dom';
import ManageProviderList from './pages/ManageProviderList';
import ManageClients from './pages/ManageClients';
import AddNewClients from './pages/AddNewClients';
import AddNewClientStep from './pages/AddNewClientStep';
import AddNewClientStep3 from './pages/AddNewClientStep3';
import Dashboard from './pages/Dashboard';
import AddUser from './pages/AddUser';
import LandingPage from './pages/LandingPage';
import PatientSearch from './pages/PatientSearch';
import ManageBilling from './pages/ManageBilling';
import AttachProgram from './pages/AttachProgram';

function App() {
  return (
    <Router>
    <div className="App">
      <Switch>
      <Route exact path="/" component={ManageBilling} />
      <Route exact path="/dashboard" component={LandingPage} />
      <Route exact path="/toolkit" component={Dashboard} />
      <Route exact path="/clients" component={ManageClients} />
      <Route exact path="/new-clients" component={AddNewClients} />
      <Route exact path="/new-clients-step2" component={AddNewClientStep} />
      <Route exact path="/new-clients-step3" component={AddNewClientStep3} />
      <Route exact path="/manage-user" component={ManageProviderList} />
      <Route exact path="/add-user" component={AddUser} />
      <Route exact path="/patient" component={PatientSearch} />
      <Route exact path="/attach-program" component={AttachProgram} />
      
      </Switch>
    </div>
    </Router>
  );
}

export default App;
