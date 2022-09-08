import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Header from '../components/Header'
import { Box,Grid,Typography } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Setting from '../components/Setting'
import {BiChevronUp, BiChevronDown,BiArrowBack, BiPlusCircle,BiXCircle,BiCheckCircle} from "react-icons/bi"
import client1 from '../images/client1.png'
import client2 from '../images/client2.png'
import Slide from '@material-ui/core/Slide'
import ManageAdminUser from '../components/ManageAdminUser'
import AdminDashboard from '../components/AdminDashboard'
import TopHeading from '../components/TopHeading'
import LeftNav from '../components/LeftNav'
import { Link } from 'react-router-dom'
const Transition = React.forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
  });

function ManageClients ({ options }) {
    const classes = useStyles();
    return (
        <div>
             <Header />
            <Box className={classes.Pagecontent}>
               <Box className={classes.Leftcol}>
               <Box className={classes.leftnav}>
                   <TopHeading />  
               <LeftNav />
                 {/* left Accordion*/}
               
                 <Box className={classes.bottomnav}>
                 <Setting />
               </Box>
               </Box>
               
               </Box>
               {/* right col */}
               <Box className={classes.Rightcol}>
               
               <Grid container spacing={3}>
                  <Grid item xs={12}>
                  <Box className={classes.providerlist}>
                  <Box className={classes.pageTop} style={{marginBottom:'40px'}}>
                  <Link to="/toolkit"><Button className={classes.backBtn}><BiArrowBack className={classes.backarrow} /></Button></Link>
                 </Box>
                      <Box className={classes.topcol}>
                    <h3 className={classes.topheading}>Client List</h3>
                    <Link to="/new-clients"><Button className={classes.addprovider}><BiPlusCircle className={classes.icon} /> Add New Client</Button></Link>
                    </Box>
                    <Box className={classes.toprow}>
                        <Box className={classes.thcol}>Profile</Box>
                        <Box className={classes.thcol2}><Box className={classes.providerbtn} role="button">Clients<span><button><BiChevronUp /></button><button><BiChevronDown /></button></span></Box></Box>
                        <Box className={classes.thcol3}>Email ID</Box>
                        <Box className={classes.thcol4}>Phone Number</Box>
                        <Box className={classes.thcol5}>Actions</Box>
                    </Box>
                    
                    <Box className={classes.providerrow}>
                        <Box className={classes.tdcol}><Box className={classes.profile}><img src={client1} alt="profile image" /></Box></Box>
                        <Box className={classes.tdcol2}><Typography className={classes.tdtext}>Denton Cardiology</Typography></Box>
                        <Box className={classes.tdcol3}><Typography className={classes.tdtext}>test@craftvedatechnology.com</Typography></Box>
                        <Box className={classes.tdcol4}><Typography className={classes.tdtext}>9775613702</Typography></Box>
                        <Box className={classes.tdcol5}>
                        <Link to="/attach-program"><Button className={classes.programsbtn}>Programs</Button></Link>
                        <Link to="/patient"><Button className={classes.PatientBtn}>Patients</Button></Link>
                         <Link to="/manage-user"><Button className={classes.view}>Users</Button></Link>
                        </Box>
                    </Box>
                    <Box className={classes.providerrow}>
                        <Box className={classes.tdcol}><Box className={classes.profile}><img src={client1} alt="profile image" /></Box></Box>
                        <Box className={classes.tdcol2}><Typography className={classes.tdtext}>Denton Cardiology</Typography></Box>
                        <Box className={classes.tdcol3}><Typography className={classes.tdtext}>test@craftvedatechnology.com</Typography></Box>
                        <Box className={classes.tdcol4}><Typography className={classes.tdtext}>9775613702</Typography></Box>
                        <Box className={classes.tdcol5}><Link to="/attach-program"><Button className={classes.programsbtn}>Programs</Button></Link><Link to="/patient"><Button className={classes.PatientBtn}>Patients</Button></Link><Link to="/manage-user"><Button className={classes.view}>Users</Button></Link></Box>
                    </Box>
                    
                </Box>
                  </Grid>
               </Grid>
               
               </Box>
            </Box>
             
        </div>
    )
}

export default ManageClients
const useStyles = makeStyles(() => ({
    Pagecontent:{
        width:'100%',
        display:'flex',
        textAlign:'left'
    },
    backBtn:{
        display:'flex',
        alignItems:'center',
        justifyContent:'flex-start',
        width:30,
        height:20,
        '&:hover':{
            background:'none'
        }
    },
    providerlist:{
        fontSize:'16px'
    },
    thcol:{
        width:'15%'
    },
    thcol2:{
        width:'20%'
    },
    thcol3:{
        width:'30%'
    },
    thcol4:{
        width:'20%'
    },
    thcol5:{
        width:'15%',
        textAlign:'right'
    },
    tdcol:{
        width:'15%'
    },
    tdcol2:{
        width:'20%'
    },
    tdcol3:{
        width:'30%'
    },
    tdcol4:{
        width:'20%'
    },
    tdcol5:{
        width:'15%',
        textAlign:'right',
        flexDirection:'row',
        alignItems:'center',
        display:'flex',
        justifyContent:'flex-end',
        '& a':{
            textDecoration:'none'
        }
    },
    topcol:{
        display:'flex',
        alignItems:'center',
        justifyContent:'space-between',
        '& a':{
            textDecoration:'none'
        }
    },
    Btnlink:{
        fontSize:'16px',
        color:'#8088A8',
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
    PatientBtn:{
        color:'#fff',
        fontFamily:'Poppins',
        background:'#E8740A',
        cursor:'pointer',
        display:'flex',
        paddingLeft:10,
        paddingRight:10,
        marginRight:5,
        fontSize:14,
        borderRadius:10,
        textTransform:'capitalize',
        '&:hover':{
            color:'#fff',
            borderRadius:10,
            background:'#121212'
        }
    },
    view:{
        color:'#fff',
        background:'#0A70E8',
        fontFamily:'Poppins',
        borderRadius:10,
        fontSize:14,
        cursor:'pointer',
        textTransform:'capitalize',
        marginLeft:5,
        '&:hover':{
            color:'#fff',
            borderRadius:10,
            background:'#121212',
        }
    },
    programsbtn:{
        color:'#fff',
        background:'#0A70E8',
        fontFamily:'Poppins',
        borderRadius:10,
        marginRight:10,
        fontSize:14,
        cursor:'pointer',
        textTransform:'capitalize',
        marginLeft:5,
        '&:hover':{
            color:'#fff',
            borderRadius:10,
            background:'#121212',
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
        borderRadius:10,
        color:'#8088A8',
        textTransform:'capitalize',
        backgroundColor:'transparent',
        marginRight:'10px',
        display:'flex',
        alignItems:'center'
    },
    btncheck:{
        color:'#5FD828',
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
        color:'#141621',
        fontFamily:'Poppins',
        fontSize:18,
        display:'flex',
        alignItems:'center',
        justifyContent:'flex-start'
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
        color:'#8088A8',
        fontSize:'20px',
        marginRight:'8px'
    },
    Leftcol:{
        width:'15%',
        padding:'20px 3%',
        position:'relative',
        minHeight:'800px'
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
        width:'83%',
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
    color:'#8088A8',
    marginLeft:'5px'
},

icon:{
  color:'#8088A8',
  fontSize:'20px',
  marginRight:'10px'
},
providerrow:{
    width:'100%',
    borderBottom:'1px #E3E5E5 solid',
    padding:'15px 0',
    alignItems:'center',
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
    color:'#48C932'
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

addprovider:{
    fontSize:'16px',
    color:'#8088A8',
    textTransform:'capitalize',
    borderRadius:10,
},
btncol:{
    display:'flex',
    justifyContent:'flex-end',
    marginTop:'100px'
},
 
   }));