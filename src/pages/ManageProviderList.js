import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Header from '../components/Header'
import { Box,Grid, Typography } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Setting from '../components/Setting'
import {BiChevronUp, BiChevronDown,BiArrowBack, BiPlusCircle} from "react-icons/bi"
import ManageUser from '../components/AdminDashboard'
import profile from '../images/doctor2.jpg'
import profile2 from '../images/doctor1.jpg'
import TopHeading from '../components/TopHeading'
import LeftNav from '../components/LeftNav'
import { Link } from 'react-router-dom'

function ManageProviderList() {
    const classes = useStyles();
    return (
        <div>
             <Header />
            <Box className={classes.Pagecontent}>
               <Box className={classes.Leftcol}>
               <Box className={classes.leftnav}>  
               <Box className={classes.pageTop} style={{marginBottom:'40px'}}>
                     
                 </Box>
                 <TopHeading />
                 {/* left Accordion*/}
                <LeftNav />
                 <Box className={classes.bottomnav}>
                 <Setting />
               </Box>
               </Box>
               
               </Box>
               {/* right col */}
               <Box className={classes.Rightcol}>
               <Button className={classes.backBtn}><BiArrowBack className={classes.backarrow} /></Button>
               <Grid container spacing={3}>
                  <Grid item xs={12}>
                  <Box className={classes.providerlist}>
                      <Box className={classes.Topcol}>
                    <h3 className={classes.topheading}>User List</h3>
                    <Link to="/add-user"><Button className={classes.addprovider}><BiPlusCircle className={classes.icon} /> Add User</Button></Link>
                    </Box>
                    <Typography style={{marginBottom:40,fontFamily:'Poppins',fontSize:18,color:'#696969'}}>Denton Cardiology</Typography>
                    <Box className={classes.Throw}>
                        <Box className={classes.Thcol}>Name</Box>
                        <Box className={classes.Thcol2}>Email</Box>
                        <Box className={classes.Thcol3}>Phone Number</Box>
                        <Box className={classes.Thcol4}>User Type</Box>
                        <Box className={classes.Thcol5}>Action</Box>
                    </Box>
                    
                    <Box className={classes.Tdrow}>
                        <Box className={classes.Tdcol}>Dr. Caldwell</Box>
                        <Box className={classes.Tdcol2}>test@craftvedatechnology.com</Box>
                        <Box className={classes.Tdcol3}>+447458148952</Box>
                        <Box className={classes.Tdcol4}>Admin</Box>
                        <Box className={classes.Tdcol5}><Button className={classes.ActionBtn}>View</Button></Box>
                    </Box>
                    <Box className={classes.Tdrow}>
                    <Box className={classes.Tdcol}>Dr. Caldwell</Box>
                        <Box className={classes.Tdcol2}>+447458148952</Box>
                        <Box className={classes.Tdcol3}>+447458148952</Box>
                        <Box className={classes.Tdcol4}>Provider</Box>
                        <Box className={classes.Tdcol5}><Button className={classes.ActionBtn}>View</Button></Box>
                    </Box>
                    
                </Box>
                  </Grid>
                  
               </Grid>
               
               </Box>
            </Box>
        </div>
    )
}

export default ManageProviderList
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
        marginTop:20,
        marginBottom:15,
        width:30,
        height:20,
        '&:hover':{
            background:'none'
        }
    },
    ActionBtn:{
        borderRadius:10,
        textTransform:'capitalize',
        background:'#0A70E8',
        color:'#fff',
        '&:hover':{
            background:'rgba(0,0,0,0.8)'
        }
    },
    Topcol:{
        display:'flex',
        flexDirection:'row',
        alignItems:'center',
        justifyContent:'space-between',
        marginBottom:'0',
        '& a':{
            textDecoration:'none'
        }
    },
    Tdcol:{
        width:'20%'
    },
    Tdcol2:{
        width:'30%'
    },
    Tdcol3:{
        width:'25%'
    },
    Tdcol4:{
        width:'15%'
    },
    Tdcol5:{
        width:'10%',
        textAlign:'right'
    },
    Thcol:{
        width:'20%'
    },
    Thcol2:{
        width:'30%'
    },
    Thcol3:{
        width:'25%'
    },
    Thcol4:{
        width:'15%'
    },
    Thcol5:{
        width:'10%',
        textAlign:'right'
    },
    addprovider:{
        fontSize:'16px',
        color:'#7087A7',
        textTransform:'capitalize'
    },
    btncol:{
        display:'flex',
        justifyContent:'flex-end'
    },
    topheading:{
        fontWeight:'600',
        color:'#141621'
    },
    Throw:{
        width:'100%',
        borderBottom:'2px #E3E5E5 solid',
        display:'flex',
        color:'#919699',
        paddingBottom:'10px',
        alignItems:'center'
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
Tdrow:{
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
  
   }));