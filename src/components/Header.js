import { Box, Grid, Link } from '@material-ui/core'
import React from 'react'
import { makeStyles } from '@material-ui/core/styles'
import logo from '../images/IGA-logo.png'
import profile from '../images/doctor1.jpg'
import TextField from '@material-ui/core/TextField'
import {BiSearch, BiBell} from "react-icons/bi"
import InputLabel from '@material-ui/core/InputLabel'
import FormHelperText from '@material-ui/core/FormHelperText'
import FormControl from '@material-ui/core/FormControl'
import Select from '@material-ui/core/Select'
import NativeSelect from '@material-ui/core/NativeSelect'

function Header() {
    const classes = useStyles();
    const [state, setState] = React.useState({
        age: '',
        name: 'hai',
      });
    
      const handleChange = (event) => {
        const name = event.target.name;
        setState({
          ...state,
          [name]: event.target.value,
        });
      };
    return (
        <div>
            <Box className={classes.headertop}>
            <Grid container spacing={3}>
               <Grid item xs={12} sm={3}><Box className={classes.logo}><h3>HealthyRPM</h3></Box></Grid>
               <Grid item xs={12} sm={6} style={{ display:'flex', alignItems:'center'}}>
                      {/* <form style={{ width:'100%'}}>
                      <Box className={classes.filterbox}>
                       <Box className={classes.searchcol}>
                           <BiSearch className={ classes.searchicon } />
                           <TextField className={classes.input}
                        placeholder="Search Patient"
          type="text"
        />
                           </Box> 
                           <Box className={classes.filtercol}>
                           <FormControl variant="outlined" className={classes.formControl}>
        <InputLabel htmlFor="outlined-age-native-simple">Filter</InputLabel>
        <Select style={{ width:'100%'}}
          native
          value={state.Filter}
          onChange={handleChange}
          label="Filter"
          inputProps={{
            name: 'filter',
            id: 'outlined-age-native-simple',
          }}
        >
          <option aria-label="None" value="" />
          <option value={10}>Ten</option>
          <option value={20}>Twenty</option>
          <option value={30}>Thirty</option>
        </Select>
      </FormControl>
                            </Box>  
                           </Box>
                      </form> */}
               </Grid>
               <Grid item xs={12} sm={3} style={{display:'flex', alignItems:'center', justifyContent:'flex-end'}}>
                   <Box className={classes.notification}><span className={classes.bellicon}></span><BiBell /></Box>
                   <Box className={classes.profilecol}>
                       <Box className={classes.profile}><img src={profile} alt="profile images" /></Box>
                       <Box className={classes.profileinfo}>
                           <h5>Olivia Smith</h5>
                           <p>olivia.smith@gmail.com</p>
                           <Link to="">Logout</Link>
                       </Box>
                   </Box>
               </Grid>
            </Grid>
            </Box>
        </div>
    )
}

export default Header
const useStyles = makeStyles(() => ({
    headertop:{
        width:'94%',
        padding:'10px 3% 10px',
        borderBottom:'1px #F6F6F6 solid',
        position:'sticky'
    },
    logo:{
        display:'flex',
        justifyContent:'flex-start',
        alignItems:'center'
    },
    searchicon:{
        position:'absolute',
        left:'15px',
        zIndex:'999',
        top:'15px',
        fontSize:'25px'
    },
    input:{ 
      
        border:'none',
        borderRadius:'10px',
        height:'55px',
        width:'90%',
        border:'1px #ccc solid',
        padding:'0 15px 0 45px',
    },
    searchcol:{
        width:'58%',
        position:'relative'
    },
    filtercol:{
        width:'35%',
        display:'flex',
        '& .MuiInputBase-formControl':{
            borderRadius:'10px !important'
        },
        '&>div':{
            width:'100%'
        }
    },
    filterbox:{
        width:'100%',
        display:'flex',
        justifyContent:'space-between',
        '& .MuiInput-underline:before':{
            display:'none'
        },
        '& .MuiInput-underline:after':{
            display:'none'
        },
        '& .MuiInput-formControl':{ 
            height:'55px',
            
        },
        '& .MuiInputBase-input':{
            height:'auto',
            borderRadius:'10px',
        }
    },
    profile:{
        width:'45px',
        height:'45px',
        borderRadius:'50px',
        marginRight:'10px',
        overflow:'hidden',
        '& img':{
            width:'100%'
        }
    },
    profileinfo:{
        '& a':{
            display:'flex',
            justifyContent:'flex-end',
            fontSize:'10px',
            color:'#7087A7'
        },
        '& h5':{
            textAlign:'left',
            margin:'0px',
            fontSize:'16px',
            color:'#141621',
        },
        '& p':{
            margin:'0px',
            color:'#AEAEAE',
            textAlign:'left',
            fontSize:'12px',
            fontWeight:'500'
        }
    },
    profilecol:{
        display:'flex'
    },
    notification:{
        marginRight:'20px',
        fontSize:'28px',
        position:'relative',
    },
   bellicon:{
    width:'5px',
    height:'5px',
    background:'#FF6E91',
    borderRadius:'50px',
    position:'absolute',
    right:'5px',
    top:'5px',
   }
}));