import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Header from '../components/Header'
import { Box,Grid, Link } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Setting from '../components/Setting'
import {BiChevronUp, BiChevronDown,BiArrowBack, BiPlusCircle,BiXCircle,BiCheckCircle} from "react-icons/bi"
import ManageUser from '../components/ManageUser'
import profile from '../images/doctor2.jpg'
import profile2 from '../images/doctor1.jpg'
import ManageProvider from '../components/ManageProvider'
import Typography from '@material-ui/core/Typography'
import PropTypes from 'prop-types'
import TextField from '@material-ui/core/TextField'
import Select from "react-dropdown-select"
import Dialog from '@material-ui/core/Dialog'
import DialogActions from '@material-ui/core/DialogActions'
import DialogContent from '@material-ui/core/DialogContent'
import DialogContentText from '@material-ui/core/DialogContentText'
import DialogTitle from '@material-ui/core/DialogTitle'
import Slide from '@material-ui/core/Slide'
import FormGroup from '@material-ui/core/FormGroup'
const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });

function ManageUserList({ options }) {
    const classes = useStyles();
    //  modal  //
  const [open, setOpen] = React.useState(false);

  const handleClickOpen = () => {
    setOpen(true);
  };

  const handleClose = () => {
    setOpen(false);
  };
    return (
        <div>
             <Header />
            <Box className={classes.Pagecontent}>
               <Box className={classes.Leftcol}>
               <Box className={classes.leftnav}>  
               <Box className={classes.pageTop} style={{marginBottom:'40px'}}>
                     <Button><BiArrowBack className={classes.backarrow} /> Back to previous</Button>
                 </Box>
                 {/* left Accordion*/}
                <ManageProvider />
                 <Box className={classes.bottomnav}>
                 <Setting />
               </Box>
               </Box>
               
               </Box>
               {/* right col */}
               <Box className={classes.Rightcol}>
               
               <Grid container spacing={3}>
                  <Grid item xs={9}>
                  <Box className={classes.providerlist}>
                    <h3 className={classes.topheading}>Manage Users</h3>
                    <Box className={classes.toprow}>
                    <Grid container spacing={3}>
                    <Grid item xs={2} style={{textAlign:'left'}}>Profile</Grid>
                    <Grid item xs={4} style={{textAlign:'left'}}><Box className={classes.providerbtn} role="button"><span><button><BiChevronUp /></button><button><BiChevronDown /></button></span> Provider</Box></Grid>
                    <Grid item xs={3}>User Level</Grid>
                    <Grid item xs={2}>User Type</Grid>
                    <Grid item xs={1}>Action</Grid>
                    </Grid>
                    </Box>
                    
                    <Box className={classes.providerrow}>
                    <Grid container spacing={3} alignItems="center">
                    <Grid item xs={2}><Box className={classes.profile}><img src={profile} alt="profile image" /></Box></Grid>
                    <Grid item xs={4}><p>Dr. Caldwell</p></Grid>
                    <Grid item xs={3}>Care Team</Grid>
                    <Grid item xs={2}>MA</Grid>
                    <Grid item xs={1}><Link to="">View</Link></Grid>
                    </Grid>
                    </Box>
                    <Box className={classes.providerrow}>
                    <Grid container spacing={3} alignItems="center">
                    <Grid item xs={2}><Box className={classes.profile}><img src={profile2} alt="profile image" /></Box></Grid>
                    <Grid item xs={4}><p>Dr. Carolyn Coursey</p></Grid>
                    <Grid item xs={3}>Client Admin</Grid>
                    <Grid item xs={2}>NP</Grid>
                    <Grid item xs={1}><Link to="">View</Link></Grid>
                    </Grid>
                    </Box>
                    
                </Box>
                  </Grid>
                  <Grid item xs={3}>
                      <Box className={classes.btncol}>
                      <Button className={classes.addprovider} onClick={handleClickOpen}><BiPlusCircle className={classes.icon} /> Add New User</Button>
                      </Box>
                  </Grid>
               </Grid>
               
               </Box>
            </Box>
             {/* modal */}
             <Dialog  className={classes.modal}
        open={open}
        TransitionComponent={Transition}
        keepMounted
        onClose={handleClose}
        aria-labelledby="alert-dialog-slide-title"
        aria-describedby="alert-dialog-slide-description"
      >
        <DialogContent className={classes.ccmmodal}>
            <Box className={classes.btncol}>
            <Button onClick={handleClose} className={classes.closebtn}><BiXCircle className={classes.closeicon} /></Button>
            </Box>
          <DialogContentText id="alert-dialog-slide-description">
          <Box className={classes.loginform}>
              <h3 className={classes.Toptext}>Add New User</h3>
              <form>
              <Grid container spacing={5}>
                  <Grid item xs={12} sm={12}>
                      <Box className={classes.Formcol}>
                          <label>Username</label>
                          <TextField className={classes.input} placeholder="Enter User Name"
                        type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Full Name</label>
                          <TextField className={classes.input} placeholder="Enter Full Name" type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>User Type</label>
                          <TextField className={classes.input} placeholder="Enter User Type" type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Phone</label>
                          <TextField className={classes.input} placeholder="Enter 10 Digit Mobile Number" type="tel" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Email</label>
                          <TextField className={classes.input} placeholder="Enter Email Address" type="text" />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Status</label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Active" className={classes.select} style={{width:'200px'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>Date Added</label>
                          04/22/2021
                      </Box>
                      <Box className={classes.Formcol}>
                          <label>User Permission</label>
                          <Select options={options} onChange={(values) => this.setValues(values)} placeholder="Client Admin" className={classes.select} style={{width:'200px'}} />
                      </Box>
                      <Box className={classes.Formcol}>
                          <label></label>
                          <Box>
                              <p style={{color:'#AEAEAE',fontSize:'14'}}>Accesses</p>
                              <Box className={classes.Accesslist}>
                                  <Button className={classes.Accessbtn}>Provider Info <BiCheckCircle className={classes.btncheck} /></Button>
                                  <Button className={classes.Accessbtn}>User Setup <BiCheckCircle className={classes.btncheck} /></Button>
                                  <Button className={classes.Accessbtn}>Program Setup <BiCheckCircle className={classes.btncheck} /></Button>
                                  <Button className={classes.Accessbtn}>Manage Care Plan <BiCheckCircle className={classes.btncheck} /></Button>
                                  <Button className={classes.Accessbtn}>Billing <BiCheckCircle className={classes.btncheck} /></Button>
                                  <Button className={classes.Accessbtn}>Patient Upload <BiCheckCircle className={classes.btncheck} /></Button>
                                  <Button className={classes.Accessbtn}>Reporting <BiXCircle className={classes.btncancel} /></Button>
                              </Box>
                          </Box>
                          
                      </Box>
                      <Box className={classes.Formcol}>
                      
                      </Box>
                  </Grid>
                  
                  
              </Grid>
            </form>
            </Box>
          </DialogContentText>
        </DialogContent>
        <DialogActions className={classes.modalbtn}>
        <Grid container spacing={3}>
                          <Grid item xs={9}>
                              <Box className={classes.Leftbutton}>
                                  <Button className={classes.Btnlink}>Credential Creation</Button>
                                  <Button className={classes.Btnlink}>Password Reset</Button>
                                  <Button className={classes.Btnlink}>Prompt Password Change Due To Policy</Button>
                              </Box>
                          </Grid>
                          <Grid item xs={3}> <Button size="large" className={classes.loginbtn}>
        Save
        </Button></Grid>
                      </Grid>
       
        </DialogActions>
      </Dialog>
        </div>
    )
}

export default ManageUserList
const useStyles = makeStyles(() => ({
    Pagecontent:{
        width:'100%',
        display:'flex',
        textAlign:'left'
    },
    providerlist:{
        fontSize:'16px'
    },
    Btnlink:{
        fontSize:'16px',
        color:'#7087A7',
        backgroundColor:'transparent',
        padding:'0 10px',
        display:'flex',
        justifyContent:'flex-start',
        textTransform:'capitalize',
        '&:hover':{
            color:'#000',
            backgroundColor:'#fff'
        }
    },
    Leftbutton:{
        display:'flex',
        flexDirection:'column',
        justifyContent:'flex-start'
    },
    Accessbtn:{
        fontSize:'14px',
        color:'#141621',
        textTransform:'capitalize',
    },
    addprovider:{
        fontSize:'16px',
        color:'#7087A7',
        textTransform:'capitalize',
        backgroundColor:'transparent',
        marginRight:'10px',
        display:'flex',
        alignItems:'center'
    },
    btncheck:{
        color:'#5FD827',
        marginLeft:'10px'
    },
    btncancel:{
        color:'#C13229',
        marginLeft:'10px'
    },
    btncol:{
        display:'flex',
        justifyContent:'flex-end'
    },
    topheading:{
        marginBottom:'50px',
        fontWeight:'600',
        color:'#141621'
    },
    toprow:{
        width:'100%',
        borderBottom:'2px #E3E5E5 solid',
        display:'flex',
        color:'#919699',
        paddingBottom:'10px',
    },
    pageTop:{
        textAlign:'left',
        marginBottom:'40px',
        display:'flex',
        '& button':{
            padding:'0px',
            background:'none',
            color:'#919699',
            fontSize:'15px',
            textTransform:'capitalize',
            fontWeight:'500'
        }
    },
    profile:{
        width:'80px',
        height:'80px',
        borderRadius:'50%',
        overflow:'hidden',
        '& img':{
            width:'100%'
        }
    },
    backarrow:{
        color:'#7087A7',
        fontSize:'20px',
        marginRight:'8px'
    },
    Leftcol:{
        width:'15%',
        padding:'20px 3%',
        position:'relative',
        minHeight:'1050px'
    },
    bottomnav:{
        position:'absolute',
        bottom:'0px',
        left:'0px'
    },
    leftnav:{
    position:'absolute',
    top:'15px',
    bottom:'15px',
    left:'40px',
    right:'40px'
    },
    Rightcol:{
        width:'73%',
        padding:'20px 3%',
        borderLeft:'1px #F6F6F6 solid',
        '& .MuiAccordionSummary-root':{
            borderBottom:'2px #E3E5E5 solid',
            height:'40px',
            color:'#919699',
            fontFamily:'Poppins',
        },
        '& .MuiAccordion-root:before':{
            display:'none'
        }
    },
    
Downarrow:{
    fontSize:'20px',
    color:'#7087A7',
    marginLeft:'5px'
},

Editbtn:{
  background:'#fff',
  border:'1px #AEAEAE solid',
  width:'60px',
  height:'30px',
  color:'#7087A7',
  textTransform:'capitalize',
  borderRadius:'10px',
  fontWeight:'600',
  '&:hover':{
    background:'#7087A7',
    color:'#fff',
  }
},

icon:{
  color:'#7087A7',
  fontSize:'20px',
  marginRight:'10px'
},
providerrow:{
    width:'100%',
    borderBottom:'1px #E3E5E5 solid',
    padding:'15px 0',
    display:'flex',
    '& p':{
        textAlign:'left'
    }
},
providerbtn:{
    display:'flex',
    cursor:'pointer',
    '& span':{
        display:'flex',
        flexDirection:'column',
        width:'20px',
        marginRight:'10px',
        '& button':{
            background:'none',
            border:'none',
            height:'10px',
            cursor:'pointer'
        }
    }
},

pageTop:{
    textAlign:'left',
    '& button':{
        padding:'0px',
        background:'none',
        color:'#919699',
        fontSize:'15px',
        textTransform:'capitalize',
        fontWeight:'500'
    }
},
checkicon:{
    fontSize:'25px',
    color:'#47C932'
},
inputfile:{
    display:'none'
},
select:{
    width:'200px',
    border:'none !important',
    borderRadius:'10px !important',
    background:'#F1F1F1',
    height:'50px',
    fontSize:'18px !important',
    paddingLeft:'15px !important',
    paddingRight:'15px !important'
},
Toptext:{
    fontSize:'18px',
    color:'#141621',
    fontWeight:'600',
    marginTop:'-15px',
    marginBottom:'30px'
},
Textheading:{
    fontSize:'16px',
    marginTop:'0px',
    fontWeight:'500'
},
Addbtn:{
    width:'180px',
    height:'45px',
    background:'#E13F66',
    borderRadius:'10px',
    color:'#fff',
    boxShadow:'0px 0px 12px 6px rgba(0, 0, 0, 0.18)',
    display:'flex',
    justifyContent:'center',
    alignItems:'center',
    textTransform:'capitalize',
    fontSize:'16px',
    '&:hover':{
        background:'#000'
    }
},
cancelbtn:{
    background:'#DADADA',
    borderRadius:'10px',
    textTransform:'capitalize',
    height:'45px',
    width:'120px',
    color:'#fff',
    fontWeight:'600',
    '&:hover':{
        background:'#000'
    }
},
nextbtn:{
    background:'#7087A7',
    borderRadius:'10px',
    textTransform:'capitalize',
    height:'45px',
    width:'120px',
    color:'#fff',
    fontWeight:'600',
    marginLeft:'15px',
    '&:hover':{
        background:'#000'
    }
},
Formcol:{
    display:'flex',
    alignItems:'center',
    marginBottom:'30px',
    '& p':{
        fontSize:'18px',
        margin:'0px'
    },
    '& label':{
        flex:'0 0 150px',
        color:'#000',
        fontSize:'15px',
        fontWeight:'400'
    },
    '& .react-dropdown-select-input':{
        width:'100%'
    }
},
addprovider:{
    fontSize:'16px',
    color:'#7087A7',
    textTransform:'capitalize'
},
btncol:{
    display:'flex',
    justifyContent:'flex-end',
    marginTop:'100px'
},
input:{ 
    border:'none',
    borderRadius:'10px',
    height:'50px',
    width:'100%',
},
loginform:{
    width:'100%',
    '& .MuiInput-underline:before':{
        display:'none'
    },
    '& .MuiInput-underline:after':{
        display:'none'
    },
    '& .MuiInput-formControl':{ 
        height:'50px',
        
    },
    '& .MuiInputBase-input':{
        height:'50px',
        borderRadius:'10px',
        background:'#F1F1F1',
        padding:'0 15px'
    }
},
loginbtn:{
    background:'#7087A7',
    padding:'0 40px',
    width:'142px',
    height:'45px',
    borderRadius:'10px',
    color:'#fff',
    marginTop:'20px',
    '&:hover':{
        background:'#333'
    }
},
modal:{
    '& .MuiPaper-rounded':{
        borderRadius:'10px !important',
        padding:'20px',
        width:'700px',
        maxWidth:'700px'
    }
},
ccmmodal:{
    borderRadius:'10px',
},
modalbtn:{
    display:'flex',
    justifyContent:'space-between',
    marginRight:'30px',
    marginLeft:'15px',
    alignItems:'center'
},
btncol:{
    display:'flex',
    justifyContent:'flex-end',
},
closebtn:{
    width:'40px',
    position:'absolute',
    right:'10px',
    height:'40px',
    background:'#fff',
    top:'10px',
    minWidth:'40px',
    '&:hover':{
        background:'#fff'
    }
},
closeicon:{
    fontSize:'25px',
    color:'#7087A7'
}, 
   }));