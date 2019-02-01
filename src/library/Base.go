package library

import (
	"github.com/kataras/iris/mvc"
)

type Base struct {
	Model   string
	Operate struct {
		Get         bool
		OriginLists bool
		Lists       bool
		Add         bool
		Edit        bool
		Delete      bool
	}
}

func (c *Base) BeforeActivation(b mvc.BeforeActivation) {
	model := c.Model
	if c.Operate.Get {
		b.Handle("POST", "/"+model+"/get", "GetOperateHandle")
	}
	if c.Operate.OriginLists {
		b.Handle("POST", "/"+model+"/originLists", "OriginListsOperateHandle")
	}
	if c.Operate.Lists {
		b.Handle("POST", "/"+model+"/lists", "ListsOperateHandle")
	}
	if c.Operate.Add {
		b.Handle("POST", "/"+model+"/add", "AddOperateHandle")
	}
	if c.Operate.Edit {
		b.Handle("POST", "/"+model+"/edit", "EditOperateHandle")
	}
	if c.Operate.Delete {
		b.Handle("POST", "/"+model+"/delete", "DeleteOperateHandle")
	}
}
